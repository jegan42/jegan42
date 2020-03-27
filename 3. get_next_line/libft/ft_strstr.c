/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strstr.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <marvin@42.fr>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/05 14:36:17 by jeagan            #+#    #+#             */
/*   Updated: 2019/04/10 22:52:28 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strstr(const char *str, const char *tofind)
{
	int i;
	int j;

	if (!str[0] && !tofind[0])
		return ((char *)str);
	i = -1;
	while (str[++i])
	{
		j = 0;
		while (tofind[j] && str[i + j] == tofind[j])
			++j;
		if (tofind[j] == '\0')
			return ((char *)&str[i]);
	}
	return ((char *)0);
}
