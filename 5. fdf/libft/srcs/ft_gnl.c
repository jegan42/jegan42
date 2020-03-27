/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_gnl.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/23 14:13:22 by jeagan            #+#    #+#             */
/*   Updated: 2019/06/09 02:09:19 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

int			ft_gnl(const int fd, char **line)
{
	static char	*save[OPEN_MAX];
	char		*leaks;
	char		buf[BUFF_SIZE + 1];
	int			ret;
	int			i;

	if ((i = 0) || fd < 0 || fd >= OPEN_MAX || !line || read(fd, buf, 0)
		|| !(save[fd] = save[fd] ? save[fd] : ft_strnew(0)))
		return (-1);
	while (!ft_strchr(save[fd], '\n') && (ret = read(fd, buf, BUFF_SIZE)) > 0)
	{
		buf[ret] = '\0';
		if (!(leaks = ft_strjoin(save[fd], buf)))
			return (-1);
		free(save[fd]);
		save[fd] = leaks;
	}
	while (save[fd][i] && save[fd][i] != '\n')
		++i;
	*line = save[fd];
	if (!(save[fd] = ft_strdup(save[fd][i] ? save[fd] + i + 1 : save[fd] + i)))
		return (-1);
	ret = (*line)[i] == '\n' ? 1 : 0;
	(*line)[i] = '\0';
	return (ret || i);
}
