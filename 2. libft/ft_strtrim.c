/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strtrim.c                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <marvin@42.fr>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/04 11:00:02 by jeagan            #+#    #+#             */
/*   Updated: 2019/04/04 11:00:03 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strtrim(char const *s)
{
	int		start;
	int		end;
	int		i;
	char	*trim;

	if (!s)
		return ((char *)0);
	start = 0;
	while (s[start] == ' ' || s[start] == '\n' || s[start] == '\t')
		++start;
	if (!s[start])
		return (ft_strdup(""));
	end = ft_strlen(s) - 1;
	while (s[end] == ' ' || s[end] == '\n' || s[end] == '\t')
		--end;
	if (!(trim = (char *)malloc(sizeof(char) * (end - start + 2))))
		return ((char *)0);
	i = -1;
	while (++i < end - start + 1)
		trim[i] = s[start + i];
	trim[i] = '\0';
	return (trim);
}
